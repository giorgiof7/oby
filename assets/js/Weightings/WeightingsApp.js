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
                { id: uuid(), isMilestone: true, registeredAt: '3 days ago', weight: 96.3 },
                { id: uuid(), isMilestone: false, registeredAt: '2 days ago', weight: 96.9 },
                { id: uuid(), isMilestone: true, registeredAt: 'yesterday', weight: 95.4 }
            ],
            numberOfSunflowers: 1,
        };
        this.handleRowClick = this.handleRowClick.bind(this);
        this.handleAddWeight = this.handleAddWeight.bind(this);
        this.handleSunflowerChange = this.handleSunflowerChange.bind(this);
        this.handleDeleteWeight = this.handleDeleteWeight.bind(this);
    }

    handleRowClick(weightLogId) {
        this.setState({highlightedRowId: weightLogId});
    }
    handleAddWeight(registeredAt, weight) {
        const newWeight = {
            id: uuid(),
            isMilestone: false,
            registeredAt: registeredAt,
            weight: weight,
        };

        this.setState(prevState => {
            const newWeightLogs = [...prevState.weightLogs, newWeight];
            return {weightLogs: newWeightLogs};
        });
    }

    handleDeleteWeight(id) {

        // this.setState(prevState => {
        //     const newWeightLogs = [...prevState.weightLogs];
        //
        //     for( let i = 0; i < newWeightLogs.length; i++){
        //         if ( newWeightLogs[i].id === id) {
        //             newWeightLogs.splice(i, 1);
        //             break;
        //         }
        //     }
        //     return {weightLogs: newWeightLogs};
        // });

        // SHORT WAY - remove the weight log without mutating state... filter return a new array
        this.setState((prevState) => {
            return {
                weightLogs: prevState.state.weightLogs.filter(weightLog => weightLog.id !== id)
            }
        });
    }

    handleSunflowerChange(sunflowerCount) {
        this.setState({
            numberOfSunflowers: sunflowerCount,
        })
    }

    render() {
        return (
            <Weightings
                {...this.props}
                {...this.state}
                onRowClick={this.handleRowClick}
                onAddWeight={this.handleAddWeight}
                onSunflowerChange={this.handleSunflowerChange}
                onDeleteWeight={this.handleDeleteWeight}
            />
        )
    }
}

WeightingsApp.propTypes = {
    withSunflower: PropTypes.bool,
}