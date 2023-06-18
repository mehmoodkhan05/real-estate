import React from 'react'
import mdImage from '../images/md.jpg'
import adilImage from '../images/adil.jpeg'
import kashifImage from '../images/kashif.jpg'

function About() {
  return (
    <>
      <div className="container-fluid text-center abtBackground">
        <div className="row">
          <div className="col">
            <h1 className="aboutUsHeading">About Us</h1>
          </div>
        </div>
      </div>

      <div className="container subtitle">
        <h6>A Bit About Our Team</h6>
        <div>
            <div className="row">
              <div className="col-5">
              </div>
              <hr className="col-2 hr" />
              <div className="col-5">
              </div>
            </div>
        </div>
        <h1>Meet The Team</h1>
      </div>

      <div className='container mt-5'>
        <div className='row'>
          <div className='col-md-6'>
            <img src={mdImage} className='image-responsive block' alt="Mehmood" width="100%" />
          </div>

          <div className='col-md-6 ps-5 text-center' style={{fontFamily: 'Georgia', paddingTop: '5%' }}>
            <h3 className='mt-5'>Team Member</h3>
            <h4 className='mt-5' style={{fontFamily: 'Georgia', paddingTop: '5%' }}>Name: Mehmood Khan</h4>
            <h4 className='mt-2' style={{fontFamily: 'Georgia', paddingTop: '3%' }}>Email: mehmadk05@gmail.com</h4>
            <h4 className='mt-2' style={{fontFamily: 'Georgia', paddingTop: '3%' }}>Contact: 0320-933 79 39</h4>
          </div>
        </div>

        <div className='row my-5'>
          

          <div className='col-md-6 ps-5 text-center' style={{fontFamily: 'Georgia', paddingTop: '5%' }}>
            <h3 className='mt-5'>Team Member</h3>
            <h4 className='mt-5' style={{fontFamily: 'Georgia', paddingTop: '5%' }}>Name: Adil Khan</h4>
            <h4 className='mt-2' style={{fontFamily: 'Georgia', paddingTop: '3%' }}>Email: adilkhanbnr7@gmail.com</h4>
            <h4 className='mt-2' style={{fontFamily: 'Georgia', paddingTop: '3%' }}>Contact: 0348-921 48 21</h4>
          </div>
          <div className='col-md-6'>
            <img src={adilImage} className='image-responsive block' alt="Adil" width="100%" />
          </div>
        </div>

        

        <div className='row my-5'>
          <div className='col-md-6'>
            <img src={kashifImage} className='image-responsive block' alt="Kashif" width="100%" />
          </div>

          <div className='col-md-6 ps-5 text-center' style={{fontFamily: 'Georgia', paddingTop: '5%' }}>
            <h3 className='mt-5'>Team Member</h3>
            <h4 className='mt-5' style={{fontFamily: 'Georgia', paddingTop: '5%' }}>Name: Kashif Ullah</h4>
            <h4 className='mt-2' style={{fontFamily: 'Georgia', paddingTop: '3%' }}>Email: kashifullah982@gmail.com</h4>
            <h4 className='mt-2' style={{fontFamily: 'Georgia', paddingTop: '3%' }}>Contact: 0342-093 55 01</h4>
          </div>
        </div>
              
      </div>
    </>
  )
}

export default About