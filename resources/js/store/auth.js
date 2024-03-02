import axios from 'axios';

export default {
    namespaced: true,
    state: {
        authenticated: false,
        role: null,
        user: {}
    },
    getters: {
        authenticated(state) {
            return state.authenticated
        },
        role(state) {
            return state.role
        },
        user(state) {
            return state.user
        }
    },
    mutations: {
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value
        },
        SET_ROLE(state, value) {
            state.role = value;
        },
        SET_USER(state, value) {
            state.user = value
        }
    },
    actions: {
        login({commit}) {
            return axios.get('/api/user').then(({data}) => {
                commit('SET_USER', data)
                commit('SET_ROLE', data.roles[0].name)
                commit('SET_AUTHENTICATED', true)
            }).catch(({res}) => {
                commit('SET_USER', {})
                commit('SET_AUTHENTICATED', false)
            })
        },
        getUser({commit}) {
            return axios.get('/api/user').then(({data}) => {
                if (data.success) {
                    commit('SET_USER', data.data)
                    commit('SET_ROLE', data.data.roles[0].name)
                    commit('SET_AUTHENTICATED', true)
                    // router.push({name: 'dashboard'})
                }
                // else {
                //     commit('SET_USER', {})
                //     commit('SET_AUTHENTICATED', false)
                // }
            }).catch(({res}) => {
                commit('SET_USER', {})
                commit('SET_ROLE', null)
                commit('SET_AUTHENTICATED', false)
            })
        },
        logout({commit}) {
            commit('SET_USER', {})
            commit('SET_ROLE', null)
            commit('SET_AUTHENTICATED', false)
        }
    }
}
