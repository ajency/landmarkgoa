import React, { Component } from 'react';
import { GoogleApiWrapper,Map, Marker } from 'google-maps-react';
import { generalConfig } from '../config';

export class GoogleMap extends Component {
    constructor(props) {
        super(props)
    }
    
    
    render() {
        return (
            <Map
            google={window.google}
            zoom = {18}
            initialCenter={this.props.latlng}
            mapTypeControl={false}
            center = {this.props.latlng}
            fullscreenControl={false}
            streetViewControl={false}
            onDragend={this.props.handleCenter}
            >
            </Map>
        );
    }

}

const LoadingContainer = () => (
    <div>Map is loading!!</div>
)
export default GoogleApiWrapper({
    apiKey: generalConfig.googleApiKey,
    LoadingContainer:LoadingContainer
})(GoogleMap)

