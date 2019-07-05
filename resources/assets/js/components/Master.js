import React, {Component} from 'react';
import { Router, Route,Link } from 'react-router';
//import { Link } from 'react-router-dom'
//import { Router, Route, Link } from 'react-router';


class Master extends Component {
  render(){
    return (
      <div className="container">
        <nav className="navbar navbar-default">
          <div className="container-fluid">
            <div className="navbar-header">
              <a className="navbar-brand" href="https://itsolutionstuff.com">ItSolutionStuff.com</a>
            </div>
            <ul className="nav navbar-nav">
              <li><Link to="/">Home</Link></li>
              <li><Link to="add-admin">Create Admin</Link></li>
              <li><Link to="display-admin">Admins</Link></li>
            </ul>
          </div>
      </nav>
          <div>
              {this.props.children}
          </div>
      </div>
    )
  }
}
export default Master;