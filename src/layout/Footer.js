import React, { Component } from 'react'
import { withRouter } from 'react-router'
class Footer extends Component {
    render() {
        return (
            <footer className="footer">
                <div className="container">
                    <div className="text-center">
                        Copyright © 2018 Dashtreme Admin
                    </div>
                </div>
            </footer>
        )
    }
}
export default withRouter(Footer);