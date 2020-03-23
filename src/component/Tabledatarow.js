import React, { Component } from 'react'

export default class Tabledatarow extends Component {
    render() {
        return (

            <tr>
                <td >{this.props.id}</td>
                <td>{this.props.ten}</td>
                <td>{this.props.age}</td>
                <td>{this.props.email}</td>
                <td>
                    <button type="button" className="btn btn-outline-danger ">Edit</button>
                    <button type="button" className="btn btn-outline-warning">Delete</button>
                </td>
            </tr>

        )
    }
}
