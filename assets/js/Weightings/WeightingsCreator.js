import React, {Component} from 'react';
import PropTypes from 'prop-types';

export default class WeightingsCreator extends Component {
    constructor(props) {
        super(props);

        this.state = {
            weightInputError: '',
            isValidates: false,
        };

        this.weightInput = React.createRef();
        this.handleFormSubmit = this.handleFormSubmit.bind(this);
    }

    handleFormSubmit(event) {
        event.preventDefault();
        const {onAddWeight} = this.props;
        const weightInput = this.weightInput.current;

        this.setState({
            isValidated: true,
        })

        if(weightInput.value <= 0) {
            this.setState({
                weightInputError: 'Please enter a value greater than 0.'
            })

            // don't submit, or clear the form
            return;
        }

        onAddWeight('now', +weightInput.value);
        weightInput.value = '';
        this.setState({
            weightInputError: '',
            isValidated: false,
        })
    }

    render() {
        const { weightInputError, isValidated } = this.state;

        return (
            <form className={`row g-3 needs-validation ${isValidated? "was-validated": ""}`} onSubmit={this.handleFormSubmit}>

                <div className="col-md-4">
                    <input type="number"
                           min={1} max={500} step={.01}
                           id="weight_log_weight"
                           ref={this.weightInput}
                           required="required"
                           placeholder="Your weight today?"
                           className={`form-control ${weightInputError? "is-invalid":""}`} />
                    {weightInputError && <div className="invalid-feedback">{weightInputError}</div> }
                </div>

                <div className="col-md-4">
                    <button className="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        )
    }
}

WeightingsCreator.propTypes = {
    onAddWeight: PropTypes.func.isRequired,
}