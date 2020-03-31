import React, { Component } from 'react'
import { withRouter } from 'react-router'

class Menubar extends Component {
    render() {
        return (
            <div id="wrapper">
                {/*Start sidebar-wrapper*/}
                <div id="sidebar-wrapper" data-simplebar data-simplebar-auto-hide="true">
                    <div className="brand-logo">
                        <a href="index.html">
                            <img src="assets/images/logo-icon.png" className="logo-icon" alt="logo icon" />
                            <h5 className="logo-text">Chill University</h5>
                        </a>
                    </div>
                    <ul className="sidebar-menu do-nicescrol">
                        <li className="sidebar-header">MAIN NAVIGATION</li>
                        <li>
                            <a href="index.html">
                                <i className="zmdi zmdi-view-dashboard" /> <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="icons.html">
                                <i className="zmdi zmdi-invert-colors" /> <span>Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms.html">
                                <i className="zmdi zmdi-format-list-bulleted" /> <span>Forms</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables.html">
                                <i className="zmdi zmdi-grid" /> <span>Tables</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i className="zmdi zmdi-calendar-check" /> <span>Calendar</span>
                                <small className="badge float-right badge-light">New</small>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html">
                                <i className="zmdi zmdi-face" /> <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="login.html" target="_blank">
                                <i className="zmdi zmdi-lock" /> <span>Login</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div className="content-wrapper">
                    <div className="container-fluid">
                        <div className="overlay toggle-menu" />
                    </div>
                </div>
                <a  className="back-to-top"><i className="fa fa-angle-double-up" /> </a>
                {/* <Footer/> */}
                
            </div>

        )
    }
}
export default withRouter(Menubar);