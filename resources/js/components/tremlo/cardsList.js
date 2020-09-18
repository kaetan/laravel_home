import React, {useState, useEffect} from 'react';
import {observer} from "mobx-react";
import TremloCard from "./card";

@observer
class TremloCardsList extends React.Component {
    /**
     * @type {TremloStore}
     */
    store = null;

    constructor(props) {
        super(props);
        this.store = props.store;
    }

    render() {
        let cardsList = this.store.cards.map((card) => {
            return <TremloCard card={card}/>
        });

        return <React.Fragment>
            {cardsList}
        </React.Fragment>
    }
}

export default TremloCardsList;
