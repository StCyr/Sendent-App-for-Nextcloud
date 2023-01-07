/* eslint-disable @nextcloud/no-deprecations */
import { translate as t, translatePlural as p } from '@nextcloud/l10n';

export default class MultiInputList {
    constructor(private container: JQuery<HTMLElement>, value, private target: JQuery<HTMLElement>, ncgroup: string) {

		// Retrieve group and default settings value
		let defaultValues: string[] = [];
		let groupValues: string[] = [];
		if (ncgroup === '') {
			// We are showing the default settings
			groupValues = value !== '' ? value.split(';').map(value => value.trim()) : [];
		} else if (typeof value !== 'object') {
			// We are showing a group's settings but no additional values have been defined
			defaultValues = value !== '' ? value.split(';').map(value => value.trim()) : [];
		} else {
			// We are showing a group's settings with both default and additional values
			groupValues = value.groupSetting !== '' ? value.groupSetting.split(';').map(value => value.trim()) : [];
			defaultValues = value.defaultSetting !== '' ? value.defaultSetting.split(';').map(value => value.trim()) : [];
		}

        this.container.addClass('collapsed');
        this.appendListToggle( defaultValues.length + groupValues.length);

		// Removes existing values in case of refresh
		try {
			this.container.find('.multiInputRow').remove();
		} catch (err) {}

		// Insert new values
        for (const value of defaultValues) {
            this.appendInput(value, false);
        }
        for (const value of groupValues) {
            this.appendInput(value, true);
        }

		// Appends an input box to let the user enter a new value
        this.appendInput('', true);

        this.target.hide();
    }

    private appendListToggle(numberOfEntries): void {

		// Removes existing toggle in case of refresh
		try {
			this.container.find('a').remove();
		} catch (err) {}

        const element = $('<a>');
        const updateLabel = () => {
            element.text(this.container.hasClass('collapsed') ?
                (
                    numberOfEntries > 0 ?
                        n('sendent', 'Show %n entry', 'Show %n entries', numberOfEntries)
                        :
                        t('sendent', 'Add new entry')
                )
                :
                n('sendent', 'Hide entry', 'Hide entries', numberOfEntries)
            );
        };

        updateLabel();

        element.prependTo(this.container);
        element.on('click', (ev) => {
            ev.preventDefault();

            this.container.toggleClass('collapsed');

            updateLabel();
        });
    }

    private appendInput(value = '', defaultValue = false) {

        const rowElement = $('<div class="multiInputRow">');
        const valueElement = $('<input type="text" placeholder="thirdparty.com or mail@thirdparty.com"/>');
		defaultValue ||  valueElement.prop('disabled', true);
        const deleteElement = $('<button type="button"><span class="icon-delete icon-visible"></span></button>');
		defaultValue ||  deleteElement.css('display', 'none');
        const inheritedElement = $('<div style="display: flex;align-items: center; margin-left: 5px"><span style="color: gray">' + t('sendent', 'Inherited') + '</span></div>');
		defaultValue && inheritedElement.css('display', 'none');

        valueElement.val(value);
        valueElement.on('change', () => this.updateValue());
        valueElement.on('input', () => {
            if (rowElement.is(':last-child')) {
                this.appendInput('', true);
            }
        })
        valueElement.appendTo(rowElement);


        deleteElement.on('click', () => {
            rowElement.remove();

            if (this.container.find('input').length === 0) {
                this.appendInput('', true);
            }

            this.updateValue();
        });
        deleteElement.appendTo(rowElement);

		inheritedElement.appendTo(rowElement);

        rowElement.appendTo(this.container);
    }

    private updateValue() {

        // Find all non-default values
        const changedValues = this.container.find('input').not(':disabled').map((_, inputElement) => $(inputElement).val()).get();
        const newValue = changedValues.map(value => value.toString().trim()).filter(value => !!value).join(';');

        this.target.val(newValue).trigger('change');

		this.appendListToggle(this.container.find('.multiInputRow').length - 1);
    }
}
