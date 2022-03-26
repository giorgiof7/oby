import React from 'react';
import PropTypes from 'prop-types';

export default function WeightingsList(props) {
    const { highlightedRowId, onRowClick, weightLogs} = props;

    return (
        <tbody>
        {weightLogs.map((weightLog) => (
            <tr
                key={weightLog.id}
                className={highlightedRowId === weightLog.id ? 'table-info' : ''}
                onClick={() => onRowClick(weightLog.id)}
            >
                <td>{weightLog.registeredAt}</td>
                <td>{weightLog.weight}</td>
                <td>{weightLog.isMilestone}</td>
                <td>...</td>
            </tr>
        ))}
        </tbody>
    )
}

WeightingsList.propTypes = {
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    weightLogs: PropTypes.array,
}