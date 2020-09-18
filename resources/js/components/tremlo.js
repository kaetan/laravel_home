import React, { useState, useEffect } from 'react';
import ReactDOM from "react-dom";
import {observer} from "mobx-react";
import TremloStore from "./tremlo/store";
import TremloCardsList from "./tremlo/cardsList";

@observer
class Tremlo extends React.Component {
    /**
     * @type {TremloStore}
     */
    store = null;

    constructor(props) {
        super(props);
        this.store = new TremloStore(props);
    }

    render() {
        return <TremloCardsList store={this.store} />
    }
}

export default Tremlo;
