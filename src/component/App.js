import React, { Component } from 'react';
import '../App.css';
import Headerweb from './headerweb';
import Table from './table';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      listdata: [],
    }
  }

  componentDidMount() {
    this.callApi()
  }

  // http://5e733a02be8c5400165c3614.mockapi.io/test/users
  callApi = () => {
    fetch('http://5e733a02be8c5400165c3614.mockapi.io/test/users')
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

  

  render() {
    //console.log(this.callApi());
    //console.log(this.state.listdata);
    return (
      <div>
        <Headerweb />
        <Table dataUser={this.state.listdata}/>
      </div>
    );
  }
}

export default App;
