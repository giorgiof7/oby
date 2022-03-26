import React, {Component} from "react";
import Weightings from "./Weightings";
import PropTypes from "prop-types";
import {v4 as uuid} from 'uuid';

export default class WeightingsApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null,
            weightLogs: [
                { id: uuid(), isMilestone: true, registeredAt: '11 anni fa', weight: 112 },
                { id: uuid(), isMilestone: false, registeredAt: 'ieri', weight: 180 },
                { id: uuid(), isMilestone: true, registeredAt: '5 mesi fa', weight: 72 }
            ],
        };
        this.handleRowClick = this.handleRowClick.bind(this);
        this.handleNewItemSubmit = this.handleNewItemSubmit.bind(this);
    }

    handleRowClick(weightLogId) {
        this.setState({highlightedRowId: weightLogId});
    }
    handleNewItemSubmit(registeredAt, weight) {
        const weightLogs = this.state.weightLogs;
        const newWeight = {
            id: uuid(),
            isMilestone: false,
            registeredAt: registeredAt,
            weight: parseInt(weight),
        }
        weightLogs.push(newWeight);
        this.setState({weightLogs: weightLogs});
    }

    render() {
        return (
            <Weightings
                {...this.props}
                {...this.state}
                onRowClick={this.handleRowClick}
                onNewItemSubmit={this.handleNewItemSubmit}
            />
        )
    }
}

WeightingsApp.propTypes = {
    withSunflower: PropTypes.bool,
}