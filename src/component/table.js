import React, { Component } from 'react'
import Tabledatarow from './Tabledatarow';

class Table extends Component {
    
    mappingDataUser = () => this.props.dataUser.map((value,key) => (
        
        <Tabledatarow 
        key={key}
        id={value.id}
        ten={value.name}
        age={value.age}
        email={value.email}
         /> 
    ))
//key la phan tu. value la` gia tri ben trong moi phan tu
// ham` map dung` de duyet tung phan tu ben trong arr ( giong voi forEach)
    render() {
        //console.log('1');
        //console.log(this.mappingDataUser());
        //console.log(this.props.dataUser);
        return (
            <table className="table table-sm table-responsive-xl">
                <thead className="thead-dark">
                    <tr>
                        <th scope="col-3">ID</th>
                        <th scope="col-3">Name</th>
                        <th scope="col-3">Age</th>
                        <th scope="col-3">Mail</th>
                        <th scope="col-3">Fuction</th>
                    </tr>
                </thead>
                <tbody>
                    {this.mappingDataUser()}
                </tbody>
            </table>
        )
    }
}
export default Table;