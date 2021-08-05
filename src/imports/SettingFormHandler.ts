/* eslint-disable @nextcloud/no-deprecations */
import SettingGroupValueAjaxCalls from "./SettingGroupValueAjaxCalls";
import SettingKeyAjaxCalls from "./SettingKeyAjaxCalls";

export default class SettingFormHandler {

    private static instance: SettingFormHandler;

    public static get(): SettingFormHandler {
        if (!this.instance) {
            this.instance = new SettingFormHandler();
        }

        return this.instance;
    }

    private calls: SettingKeyAjaxCalls;
    private valuecalls: SettingGroupValueAjaxCalls;

    private constructor() {
        this.calls = new SettingKeyAjaxCalls();
        this.valuecalls = new SettingGroupValueAjaxCalls();
    }

    public async loopThroughSettings(): Promise<void> {
        const allSettings = await this.valuecalls.list();

        $(".settingkeyvalue").each((index, element) => {
            const name = $(element).find("[name='settingkeyname']").val()?.toString();
            const key = $(element).find("[name='settingkeykey']").val()?.toString();
            const templateId = $(element).find("[name='settingkeytemplateid']").val()?.toString();
            const groupId = $(element).find("[name='settinggroupid']").val()?.toString();
            const value = $(element).find(".settingkeyvalueinput").val()?.toString();
            const valueType = $(element).find(".settingkeyvalueinput").prop('type');

            if (!key || !name || !templateId || !valueType || typeof value !== 'string' || !groupId) {
                return;
            }

            const setting = allSettings.filter(candidate => candidate.settingkeyid.toString() === key);

            if (setting.length < 1) {
                this.saveSetting($(element).parents('.personal-settings-setting-box'));
            }

            //when settingkey is present: populate UI
            try {
                $(element).find("[name='settingkeyvalueinput']").val(setting[0].value);

                if ($(element).find(".settingkeyvalueinput.theming-color").length > 0) {
                    this.refreshColorPicker(element);
                }
            } catch (err) {
                console.warn(key);
                console.warn(name);
                console.warn(setting[0]);
                console.warn(err.message);

                //when no settingkey is present
                this.initSettingKey(element, key, name, valueType, templateId, value, groupId);
            }
        });

        this.setShowHideAllSettings();
    }

    private refreshColorPicker(element: HTMLElement): void {
        new (<any>window).jscolor($(element).find(".settingkeyvalueinput.theming-color")[0], { hash: true });
    }

    private async initSettingKey(element: HTMLElement, key: string, name: string, valueType: string, templateId: string, value: string, groupId: string) {
        const data = await this.calls.create(key, name, valueType, templateId);

        $(element).find("[name='settingkeyid']").val(data.key);

        try {
            await this.valuecalls.showBySettingKeyId(key);
        } catch (err) {
            //when no settinggroupvalue is present
            const data2 = await this.valuecalls.create(data.key, value, groupId);

            //when no settinggroupvalue is present: create settinggroupvalue
            //TODO: We have to check if settingkeyvaluetype is indicating DOM element is supposed to contain HTML without rendering it.
            $(element).find(".settingkeyvalueinput").val(data2.value)
        }
    }

    public async saveSetting(settingbox: JQuery<HTMLElement>): Promise<boolean> {
        const settingkeyvalueblock = $(settingbox).find(".settingkeyvalue")[0]; //@TODO

        //@TODO move to method
        const id = $(settingkeyvalueblock).find("[name='settingkeyid']").val()?.toString();
        const name = $(settingkeyvalueblock).find("[name='settingkeyname']").val()?.toString();
        const key = $(settingkeyvalueblock).find("[name='settingkeykey']").val()?.toString();
        const groupId = $(settingkeyvalueblock).find("[name='settinggroupid']").val()?.toString();
        const value = $(settingkeyvalueblock).find(".settingkeyvalueinput").val()?.toString();

        console.log("settingkeyname     = " + name);
        console.log("settingkeykey      = " + key);
        console.log("settingkeyvalue    = " + value);

        if (!id || !groupId || typeof value !== 'string') {
            return false;
        }

        try {
            const valuedata = await this.valuecalls.showBySettingKeyId(id);
            const data3 = await this.valuecalls.update(id, id, value, groupId);

            $(settingkeyvalueblock).find(".settingkeyvalueinput").val(data3.value);


        } catch (err) {
            //when no settinggroupvalue is present
            const data3 = await this.valuecalls.create(id, value, groupId);

            $(settingkeyvalueblock).find(".settingkeyvalueinput").val(data3.value);
        }

        const statusElement = $(settingkeyvalueblock).find(".status-ok")[0];
        $(statusElement).removeClass("hidden").addClass("shown").delay(1000).queue(function (next) {
            $(this).addClass("hidden");
            $(this).removeClass("shown")
            next();
        });

        return true;
    }

    private setShowHideAllSettings(): void {
        const personalSettingBoxes = $(".personal-settings-setting-box");

        personalSettingBoxes.each((_, settingbox) => {
            const values = $(settingbox).find(".settingkeyvalueinput");
            const settingkeyid = $(settingbox).find("[name='settingkeyname']").val()?.toString();

            if (!settingkeyid) {
                return;
            }

            values.each(() => {
                this.showHideAttachmentSize(values, settingkeyid);
                this.showHideAdvancedTheming(values, settingkeyid);
            });
        });
    }

    showHideAttachmentSize(settingkeyvalues: JQuery<HTMLElement>, settingkeyid: string): void {
        const settingkeyvalue = settingkeyvalues.val();

        if (settingkeyid == "attachmentmode") {
            if (settingkeyvalue == "MaximumAttachmentSize") {
                $(".personal-settings-setting-box#attachmentsize").removeClass("hidden").addClass("shown");
            }
            else {
                $(".personal-settings-setting-box#attachmentsize").addClass("hidden").removeClass("shown");
            }
        }
        else if (settingkeyid == "sendmode") {
            if (settingkeyvalue == "Separate") {
                $(".personal-settings-setting-box#htmlsnippetpassword").removeClass("hidden").addClass("shown");
            }
            else {
                $(".personal-settings-setting-box#htmlsnippetpassword").addClass("hidden").removeClass("shown");
            }
        }
    }

    showHideAdvancedTheming(settingkeyvalues: JQuery<HTMLElement>, settingkeyid: string): void {
        const settingkeyvalue = settingkeyvalues.val();

        if (settingkeyid == "AdvancedThemingEnabled") {
            if (settingkeyvalue == "true") {
                $(".advancedTheming").removeClass("hidden").addClass("shown");
            }
            else {
                $(".advancedTheming").addClass("hidden").removeClass("shown");
            }
        }
    }
}
