
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import React from 'react';
import { render } from 'react-dom';
import { Router, Route } from 'react-router';

// import { createBrowserHistory } from "history";

// const customHistory = createBrowserHistory();

import Master from './components/Master';

render(
 // <Router history={customHistory}>
    <Route exact={true} path="/" component={Master} />
 // </Router>
  , document.getElementById('crud-app'));

