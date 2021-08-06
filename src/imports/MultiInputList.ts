/* eslint-disable @nextcloud/no-deprecations */

export default class MultiInputList {
    constructor(private container: JQuery<HTMLElement>, private value: string, private target: JQuery<HTMLElement>) {
        const values = value.split(';').map(value => value.trim());

        for (const value of values) {
            this.appendInput(value);
        }

        if (values[values.length - 1]) {
            this.appendInput();
        }

        this.target.hide();
    }

    private appendInput(value = '') {
        const rowElement = $('<div class="multiInputRow">');
        const valueElement = $('<input type="text" placeholder="thirdparty.com or mail@thirdparty.com"/>');
        const deleteElement = $('<button type="button"><span class="icon-delete icon-visible"></span></button>');

        valueElement.val(value);
        valueElement.on('change', () => this.updateValue());
        valueElement.on('input', () => {
            if (rowElement.is(':last-child')) {
                this.appendInput();
            }
        })
        valueElement.appendTo(rowElement);


        deleteElement.on('click', () => {
            rowElement.remove();

            if (this.container.find('input').length === 0) {
                this.appendInput();
            }

            this.updateValue();
        });
        deleteElement.appendTo(rowElement);

        rowElement.appendTo(this.container);
    }

    private updateValue() {
        const changedValues = this.container.find('input').map((_, inputElement) => $(inputElement).val()).get();
        const newValue = changedValues.map(value => value.toString().trim()).filter(value => !!value).join(';');

        this.target.val(newValue).trigger('change');
    }
}
