import React from 'react';
import PropTypes from 'prop-types';

export default function WeightingsList(props) {
    const {
        highlightedRowId,
        onRowClick,
        onDeleteWeight,
        weightLogs
    } = props;

    const handleDeleteClick = function (event, weightLogId) {
        event.preventDefault();
        onDeleteWeight(weightLogId);
    }

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
                <td>
                    <a
                        href='#'
                        onClick={(e) => handleDeleteClick(e, weightLog.id)}
                    >
                        <span className='fa fa-trash'> </span>
                    </a>
                </td>
            </tr>
        ))}
        </tbody>
    )
}

WeightingsList.propTypes = {
    highlightedRowId: PropTypes.any,
    onRowClick: PropTypes.func.isRequired,
    onDeleteWeight: PropTypes.func.isRequired,
    weightLogs: PropTypes.array,
}