import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';

export default class SettingKeyAjaxCalls {
    private endpoint: string;

    constructor() {
        this.endpoint = generateUrl('/apps/sendent/api/1.0/settingkey');
    }

    public async list(): Promise<any> {
        const response = await axios.get(this.endpoint + '/index');

        return response.data;
    }

    public async show(id: string): Promise<any> {
        const response = await axios.get(this.endpoint + '/' + id);

        return response.data;
    }

    public async showByKey(key: string): Promise<any> {
        const response = await axios.get(this.endpoint + '/showByKey/' + key);

        return response.data;
    }

    public async update(id: string, key: string, name: string, valuetype: string, templateid: string): Promise<any> {
        const data = { name, key, valuetype, templateid };
        const response = await axios.put(this.endpoint + '/' + id, data);

        console.log('updated settingkey was submitted new name: ' + name + ' and valuetype: ' + valuetype);

        return response.data;
    }

    public async create(key: string, name: string, valuetype: string, templateid: string): Promise<any> {
        const data = { name, key, valuetype, templateid };
        const response = await axios.post(this.endpoint, data);

        console.log('new settingkey was submitted named: ' + name);

        return response.data;
    }

    public async remove(id: string): Promise<any> {
        const response = await axios.delete(this.endpoint + '/' + id);

        return response.data;
    }
}
