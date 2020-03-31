import React, { Component } from 'react'

export default class Insert extends Component {
    constructor(props) {
        super(props);
        this.state = {
            takedata: ''
        }
    }
    onChange = (e) => {
        this.setState({
            takedata: e.target.value
        })
        console.log(this.state.takedata);
        
    }
    render() {
        return (
            <form>
                <div className="form-group col-md-6">
                    <label htmlFor="inputEmail4">1</label>
                    <input type="text" name="" onChange={(e)=>this.onChange(e)} className="form-control" id="inputEmail4" />
                </div>
                <div className="form-group col-md-6">
                    <label htmlFor="inputPassword4">2</label>
                    <input type="text" onChange={(e)=>this.onChange(e)} className="form-control" id="inputPassword4" />
                </div>
                <div className="form-group col-md-6">
                    <label htmlFor="inputEmail4">3</label>
                    <input type="text" onChange={(e)=>this.onChange(e)} className="form-control" id="inputEmail4" />
                </div>
                <div className="form-group col-md-6">
                    <label htmlFor="inputPassword4">4</label>
                    <input type="text" onChange={(e)=>this.onChange(e)} className="form-control" id="inputPassword4" />
                </div>
                <button type="submit" className="btn btn-primary">Insert</button>
            </form>
        )
    }
}
