import React, { Component } from 'react';
import { BrowserRouter as Router, Route } from "react-router-dom";
import login from '../login/login';
import Menubar from '../layout/Menubar'
import liststudent from '../components/staff/liststudent'
import listsubject from '../components/staff/listsubject'
import listtutor from '../components/staff/listtutor'
class ReactRouter extends Component {
    render() {
        return (
            <div>
                <Router>
                    <Menubar/>
                    {/* <Route path="/" component={login} /> */}
                    <Route path="/listsudent" component={liststudent} />
                    <Route path="/listsubject" component={listsubject} />
                    <Route path="/listtutor" component={listtutor}/>
                </Router>

            </div>
        );
    }
}

export default ReactRouter;
