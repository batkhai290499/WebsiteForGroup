import React, { Component } from 'react'

export default class listtutor extends Component {
    render() {
        return (
            <div>
                <div className="col-lg-6">
                    <div className="card">
                        <div className="card-body">
                            <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> ADD </button>
                            <h5 className="card-title">Striped Table</h5>
                            <div className="table-responsive">
                                <table className="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>
                                                <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> EDIT </button>
                                                <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> DELETE </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>
                                                <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> EDIT </button>
                                                <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> DELETE </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td>
                                                <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> EDIT </button>
                                                <button type="button" className="btn btn-light waves-effect waves-light"><i className="fa fa-cog mr-1" /> DELETE </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        )
    }
}
