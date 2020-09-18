import React, { Component } from "react";
import ReactDOM from "react-dom";

class TremloCard extends Component {
    /**
     * @type {TremloStore}
     */
    card = null;

    constructor(props) {
        super(props);
        this.card = props.card;
    }

    render() {
        return (
            <div className="card" style={{width: 200}}>
                <div className="card-header">
                    Click to add title!
                </div>
                <div className="card-body">
                    <p className="card-text">
                        Click to add text!
                    </p>
                </div>
            </div>
        );
    }
}

export default TremloCard;
