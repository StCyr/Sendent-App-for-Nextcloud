import axios from '@nextcloud/axios';
import { generateUrl } from '@nextcloud/router';

export default class SettingGroupValueAjaxCalls {

    private endpoint: string;

    constructor() {
        this.endpoint = generateUrl('/apps/sendent/api/1.0/settinggroupvalue');
    }

    public async list(): Promise<any> {
        const response = await axios.get(this.endpoint + '/index');

        return response.data;
    }

    public async show(id: string): Promise<any> {
        const response = await axios.get(this.endpoint + '/' + id);

        return response.data;
    }

    public async showBySettingKeyId(key: string): Promise<any> {
        const response = await axios.get(this.endpoint + '/showbysettingkeyid/' + key);

        return response.data;
    }


    public async update(id: string, settingkeyid: string, value: string, groupid: string): Promise<any> {
        const data = { settingkeyid, value, groupid };
        const response = await axios.put(this.endpoint + '/' + id, data);

        console.log('updated settingkey was submitted new value: ' + value + ' and settingkeyid: ' + settingkeyid);

        return response.data;
    }

    public async create(settingkeyid: string, value: string, groupid: string): Promise<any> {
        const data = { settingkeyid, value, groupid };
        const response = await axios.post(this.endpoint, data);

        console.log('new settingkey was submitted with value: ' + value);

        return response.data;
    }

    public async remove(id: string): Promise<any> {
        const response = await axios.delete(this.endpoint + '/' + id);

        return response.data;
    }
}
