import React, {Component} from 'react';
import PropTypes from 'prop-types';

export default class WeightingsCreator extends Component {
    constructor(props) {
        super(props);
        this.weightValue = React.createRef();
        this.handleFormSubmit = this.handleFormSubmit.bind(this);
    }

    handleFormSubmit(event) {
        event.preventDefault();
        const {onNewItemSubmit} = this.props;
        const weightValue = this.weightValue.current;

        onNewItemSubmit('now', weightValue.value);
        weightValue.value = '';
    }

    render() {
        return (
            <form className="form-inline" onSubmit={this.handleFormSubmit}>
                <div className="form-group">
                    <label className="sr-only control-label required"
                           htmlFor="rep_log_reps">
                        What's the weight today?
                    </label>
                    <input type="number"
                           id="weight_log_weight"
                           ref={this.weightValue}
                           required="required"
                           placeholder="Your weight?"
                           className="form-control"/>
                </div>
                {' '}
                <button type="submit" className="btn btn-primary">Got
                    it!
                </button>
            </form>
        )
    }
}

WeightingsCreator.propTypes = {
    onNewItemSubmit: PropTypes.func.isRequired,
}