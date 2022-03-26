import React from "react";
import WeightingsList from "./WeightingsList";
import WeightingsCreator from "./WeightingsCreator";
import PropTypes from "prop-types";

function calculateAverageWeight(weightLogs) {
    if (!weightLogs.length) {
        return 0;
    }
    let total = 0, avg;
    for(let weightLog of weightLogs) {
        total += weightLog.weight;
    }
    avg = total / weightLogs.length;
    // rounded at most 2 decimal places
    return Math.round((avg + Number.EPSILON) * 100) / 100;
}

export default function Weightings(props) {
    const {
        withSunflower,
        highlightedRowId,
        onRowClick,
        onAddWeight,
        onSunflowerChange,
        onDeleteWeight,
        weightLogs,
        numberOfSunflowers,
    } = props;

    let sunflower = '';
    if (withSunflower) {
        sunflower = <span>{'🌻'.repeat(numberOfSunflowers)}</span>;
    }

    return (
        <div>
            <h2>Weightings {sunflower}</h2>

            <input
                type={"range"}
                value={numberOfSunflowers}
                onChange={(e) => {
                    onSunflowerChange(+e.target.value)
                }}
            />

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
                    onDeleteWeight={onDeleteWeight}
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
                onAddWeight={onAddWeight}
            />

        </div>
    );
}

Weightings.propTypes = {
    withSunflower: PropTypes.bool,
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    onAddWeight: PropTypes.func.isRequired,
    onSunflowerChange: PropTypes.func.isRequired,
    onDeleteWeight: PropTypes.func.isRequired,
    weightLogs: PropTypes.array,
    numberOfSunflowers: PropTypes.number.isRequired,
}