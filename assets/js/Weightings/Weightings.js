import React from "react";
import WeightingsList from "./WeightingsList";
import WeightingsCreator from "./WeightingsCreator";
import PropTypes from "prop-types";

function calculateAverageWeight(weightLogs) {
    let total = 0, avg = 0;
    for(let weightLog of weightLogs) {
        total += weightLog.weight;
    }
    return  total / weightLogs.length;
}

export default function Weightings(props) {
    const {
        withSunflower,
        highlightedRowId,
        onRowClick,
        onNewItemSubmit,
        weightLogs
    } = props;

    let sunflower = '';
    if (withSunflower) {
        sunflower = <span>🌻</span>;
    }

    return (
        <div>
            <h2>Weightings {sunflower}</h2>
            <table className="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Weight</th>
                    <th scope="col">&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <WeightingsList
                    highlightedRowId={highlightedRowId}
                    onRowClick={onRowClick}
                    weightLogs={weightLogs}
                />
                <tfoot>
                <tr>
                    <td>Average</td>
                    <td>{calculateAverageWeight(weightLogs)}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </tfoot>
            </table>

            <WeightingsCreator
                onNewItemSubmit={onNewItemSubmit}
            />

        </div>
    );
}

Weightings.propTypes = {
    withSunflower: PropTypes.bool,
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    onNewItemSubmit: PropTypes.func.isRequired,
    weightLogs: PropTypes.array,
}