import {observable, action, toJS, computed} from 'mobx';

export default class TremloStore {
    @observable isLoaderShow = false;
    @observable cards = [];

    constructor(data) {
        /*
         * data.orderItems
         */
        this.cards = data.cards;
    }
}
