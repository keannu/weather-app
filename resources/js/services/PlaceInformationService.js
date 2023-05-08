import axios from 'axios';

const oPlaceInfoServiceApiClient = axios.create({
    baseURL: '/api/place/info',
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
});

export default {
    /**
     * getPlaceInformation
     * @author Keannu Rim Kristoffer C. Regala <keannu>
     * @since 2023.05.06
     * @param { string } sCity
     * @returns { object }
     */
    getPlaceInformation(sCity) {
        return oPlaceInfoServiceApiClient.get('/', { params: { city: sCity } });
    }
}
