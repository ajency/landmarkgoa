import React, { Component } from 'react';
import './App.css';
import './assets/scss/main.scss';
// import { BrowserRouter as Router, Route } from "react-router-dom";
import { HashRouter as Router, Route } from 'react-router-dom';
import Cart from './components/cart/cart.js';
import AddNewAddress from './components/add-new-addess/add-new-address';
import AddressList from './components/address-list/address-list';
import VerifyMobile from './components/login/verify-mobile';
import OrderSummary from './components/order-summary/order-summary';
import OrderDetail from './components/order-details/order-details';

class App extends Component {
  render() {
    return (
      <Router>
        <Route path="/cart" component={Cart} />
        <Route path="/address" component={AddressList} />
        <Route path="/add-address" component={AddNewAddress} />
        <Route path="/verify-mobile" component={VerifyMobile} />
        <Route exact path="/order-summary/:cart_id/:address_id" component={OrderSummary}></Route>
        <Route exact path="/order-details/:payment_id" component={OrderDetail}></Route>
      </Router>
    );
  }

  getComponent(){
  	console.log("check ==>", window.location.hash);
  	if(window.location.hash === '#/cart'){
  		return (<Cart/>)
  	}
  	else if(window.location.hash === '#/cart/address'){
  		return ( <AddressList/>);
  	}
  	else if(window.location.hash === '#/cart/add-address'){
  		return (  <AddNewAddress latlng={{lat:15.487590683051524,lng:73.83213189817026}} address={"Panjim Convention Centre, Panjim goa"}/> );
  	}
    else if(window.location.hash === '#/cart/verify-mobile'){
      return ( <VerifyMobile/>);
    }
  }
}

export default App;