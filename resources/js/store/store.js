import Vue from 'vue';
import Vuex from 'vuex';

import oPlaceInformation from './../modules/placeInformationModule';

Vue.use(Vuex);

export default new Vuex.Store({
    modules : {
        oPlaceInformation
    }
});
