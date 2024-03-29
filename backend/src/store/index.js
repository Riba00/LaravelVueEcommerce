import {createStore} from "vuex";
import * as actions from './actions.js';
import * as mutations from './mutations.js';
import state from './state';

const store = createStore({
    state,
    getters:{},
    actions,
    mutations,
})

export default store;
