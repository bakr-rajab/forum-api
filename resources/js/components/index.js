import React,{useState} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Switch, Route} from "react-router-dom";
import Navbar from "./navbar";
import ListOfThings from './ListOfThings';
import Home from "./Home";

function Example() {

    return (
        <BrowserRouter>
            <div>
              <Navbar/>

                <Switch>
                    <Route exact path="/list" component={ ListOfThings } />
                    <Route component={ Home } />
                </Switch>
            </div>
        </BrowserRouter>

    );
}

export default Example;

if (document.getElementById('react-app')) {
    ReactDOM.render(<Example />, document.getElementById('react-app'));
}
