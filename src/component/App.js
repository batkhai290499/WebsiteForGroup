import React, { Component } from 'react';
import '../App.css';
import Headerweb from './headerweb';
import Table from './table';
import Search from './Search';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      listdata: [],
      searchText: '',
    }
  }

  componentDidMount() {
    this.callApi()
  }


  // API of Khuat Tien Thanh
  // http://5e733a02be8c5400165c3614.mockapi.io/test/users

  //API from typicode.com
  //https://jsonplaceholder.typicode.com/posts
  callApi = () => {
    fetch('https://jsonplaceholder.typicode.com/posts')
      .then((response) => {
        return response.json()
          .then(data => {
            //console.log(data)
            this.setState({
              listdata: data
            });
            //console.log(this.state.listdata);

          })
      }
      )
      .catch(err => {
        console.log('Error <3', err)
      });
  }

  getTextSearch = (dl) => {
    this.setState({//gan du lieu ma` minh` da nhap vao o search vao` (dl)
      searchText: dl 
    })
    //console.log(this.state.searchText);
  }



  render() {
    //console.log(this.callApi());
    //console.log(this.state.listdata);
    //console.log(this.state.dl);
    var ketqua = []; // khai bao 1 mang ket qua
    this.state.listdata.forEach((item)=>{ // quet toan bo du lieu data va dua vao 1 cai item tuy` vao` phan` tu dua vao
      if(item.title.indexOf(this.state.searchText) !== -1) { // neu indexOf khac -1 tuc la co phan tu
        ketqua.push(item); // dua vao mang ket qua
      }
    })
    
    
    return (
      <div>
        <Headerweb />
        <Search checkConnectProps={(dl) => this.getTextSearch(dl)} />
        <Table dataUser={ketqua} /> 
        {/* dua vao mang dataUser de hien thi ket qua search */}
      </div>
    );
  }
}

export default App;
