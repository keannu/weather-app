import PlaceInformationService from '../services/PlaceInformationService';

const oInitialStates = {
    oWeather: {},
    aNearbyPlaces: []
};

const mutations = {
    /**
     * SET_WEATHER
     * @author Keannu Rim Kristoffer C. Regala <keannu>
     * @since 2023.05.06
     * @param { object } state
     * @param { object } oWeather
     */
    SET_WEATHER(state, oWeather) {
        state.oWeather = oWeather;
    },

    /**
     * SET_NEARBY_PLACES
     * @author Keannu Rim Kristoffer C. Regala <keannu>
     * @since 2023.05.06
     * @param { object } state
     * @param { array } aNearbyPlaces
     * @constructor
     */
    SET_NEARBY_PLACES(state, aNearbyPlaces) {
        state.aNearbyPlaces = aNearbyPlaces;
    }
};

const actions = {
    /**
     * fetchPlaceInformation
     * @author Keannu Rim Kristoffer C. Regala <keannu>
     * @since 2023.05.06
     * @param object commit
     * @param { string } sCity
     */
    async fetchPlaceInformation({ commit }, sCity) {
        commit('SET_WEATHER', {});
        commit('SET_NEARBY_PLACES', []);
        await PlaceInformationService.getPlaceInformation(sCity)
            .then(oResponse => {
                if (oResponse.status === 200) {
                    commit('SET_WEATHER', oResponse.data.weather);
                    commit('SET_NEARBY_PLACES', oResponse.data.nearby_places);
                }
            });
    }
};

const getters = {
    /**
     * oWeather
     * @author Keannu Rim Kristoffer C. Regala <keannu>
     * @since 2023.05.06
     * @param { object } state
     * @returns { object }
     */
    oWeather(state) {
        return state.oWeather;
    },

    /**
     * aNearbyPlaces
     * @author Keannu Rim Kristoffer C. Regala <keannu>
     * @since 2023.05.06
     * @param { object } state
     * @returns { array }
     */
    aNearbyPlaces(state) {
        return state.aNearbyPlaces;
    }
};

export default {
    state: oInitialStates,
    mutations,
    actions,
    getters,
    namespaced: true
}
