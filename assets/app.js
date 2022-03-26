import React from "react";
import { render } from "react-dom";
import './styles/app.scss';
import WeightingsApp from "./js/Weightings/WeightingsApp";


const shouldShowSunflower = true;

render(
    <WeightingsApp withSunflower={shouldShowSunflower}/>,
    document.getElementById('weightings-app')
);
