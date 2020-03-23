import React, { Component } from 'react'

export default class Search extends Component {
    constructor(props) {
        super(props);
        this.state = {
            tempValue:''
        }        
    }
    
    isChange = (event) => { // bien trung gian de dong goi du lieu trong input xuong button
        //console.log(event.target.value);
        this.setState({
            tempValue: event.target.value
        })
    }
    render() {
        return (
            <div className="container">
                <div className="input-group">
                    <input type="text" className="form-control" placeholder="Search for..."
                     onChange={(event)=>this.isChange(event)}/>
                    <span className="input-group-btn">
                        <button className="btn btn-search" onClick={(dl)=>this.props.checkConnectProps(this.state.tempValue)} 
                        type="button"><i className="fa fa-search fa-fw" /> Search</button>
                    </span>
                </div>
            </div>
        )
    }
}
