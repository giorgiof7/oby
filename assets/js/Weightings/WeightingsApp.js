import React, {Component} from "react";

export default class WeightingsApp extends Component {
    constructor(props) {
        super(props);

        this.state = {
            highlightedRowId: null
        };
    }

    handleRowClick(weightLogId, event) {
        this.setState({highlightedRowId: weightLogId});
    }

    render() {
        const { highlightedRowId } = this.state;
        const { withSunflower } = this.props;
        
        let sunflower = '';
        if (withSunflower) {
            sunflower = <span>🌻</span>;
        }
        const weightLogs = [
            { id: 1, isMilestone: true, registeredAt: '11 anni fa', weight: 112.5 },
            { id: 2, isMilestone: false, registeredAt: 'ieri', weight: 180 },
            { id: 8, isMilestone: true, registeredAt: '5 mesi fa', weight: 72 }
        ];

        return (
            <div>
            <h2>Weightings {sunflower}</h2>
            <table className="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Weight</th>
                        <th scope="col"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                {weightLogs.map((weightLog) => (
                    <tr
                        key={weightLog.id}
                        className={highlightedRowId === weightLog.id ? 'table-info' : ''}
                        onClick={() => this.handleRowClick(weightLog.id, event)}
                    >
                        <td>{weightLog.registeredAt}</td>
                        <td>{weightLog.weight}</td>
                        <td>{weightLog.isMilestone}</td>
                        <td>...</td>
                    </tr>
                ))}
                </tbody>
            </table>

        </div>
        );
    }
}