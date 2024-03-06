import axios from "axios";
import { useEffect, useState } from "react";

function Bookings() {
  const token = localStorage.getItem("email");

  const [houses, setHouses] = useState([]);
  useEffect(() => {
    getHomes();
  });

  function getHomes() {
    axios
      .get(`http://localhost/FYP/api/rentHouseBookings.php?id=${token}`)
      .then((res) => {
        setHouses(res.data);
      });
  }

  const [housesBuy, setHousesBuy] = useState([]);
  useEffect(() => {
    getHomesBuy();
  });

  function getHomesBuy() {
    axios
      .get(`http://localhost/FYP/api/buyHouses.php?id=${token}`)
      .then((res) => {
        setHousesBuy(res.data);
      });
  }

  const [flatRent, setflatRent] = useState([]);
  useEffect(() => {
    getFlatRent();
  });

  function getFlatRent() {
    axios
      .get(`http://localhost/FYP/api/rentFlats.php?id=${token}`)
      .then((res) => {
        setflatRent(res.data);
      });
  }

  const [flatBuy, setflatBuy] = useState([]);
  useEffect(() => {
    getFlatBuy();
  });

  function getFlatBuy() {
    axios
      .get(`http://localhost/FYP/api/buyFlatss.php?id=${token}`)
      .then((res) => {
        setflatBuy(res.data);
      });
  }

  const [PlotBuy, setPlotBuy] = useState([]);
  useEffect(() => {
    getPlotBuy();
  });

  function getPlotBuy() {
    axios
      .get(`http://localhost/FYP/api/buy_plot.php?id=${token}`)
      .then((res) => {
        setPlotBuy(res.data);
      });
  }

  const [rooms, setRooms] = useState([]);
  useEffect(() => {
    getRooms();
  });

  function getRooms() {
    axios
      .get(`http://localhost/FYP/api/roomBook.php?id=${token}`)
      .then((res) => {
        setRooms(res.data);
      });
  }

  return (
    <>
      <div className="container mt-5 mb-5">
        <h5>House Booking (Rent)</h5>
        <div className="row">
          <div className="col-md-12"></div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Booking By</th>
              <th scope="col">Booking Date</th>
              <th scope="col">System Date</th>
              <th scope="col">Price</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            {houses.map((house, key) => (
              <tr key={key}>
                <td>{house.user_name}</td>
                <td>{house.booking_date}</td>
                <td>{house.dateandtime}</td>
                <td>{house.h_price}</td>
                <td>{house.loc_name}</td>
                <td>
                  {house.b_status === "0"
                    ? "Rejected"
                    : house.b_status === "0"
                    ? "Accepted"
                    : "Pending"}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <hr />

      <div className="container mt-5 mb-5">
        <h5>House Booking (Buy)</h5>
        <div className="row">
          <div className="col-md-12"></div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Booking By</th>
              <th scope="col">System Date</th>
              <th scope="col">Quated Price</th>
              <th scope="col">Requested Price</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            {housesBuy.map((houseBuy, key) => (
              <tr key={key}>
                <td>{houseBuy.user_name}</td>
                <td>{houseBuy.dateandtime}</td>
                <td>{houseBuy.h_price}</td>
                <td>{houseBuy.quoted_price}</td>
                <td>{houseBuy.loc_name}</td>
                <td>
                  {houseBuy.b_status === "0"
                    ? "Rejected"
                    : houseBuy.b_status === "0"
                    ? "Accepted"
                    : "Pending"}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <hr />

      <div className="container mt-5 mb-5">
        <h5>Flat Booking (Rent)</h5>
        <div className="row">
          <div className="col-md-12"></div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Booking By</th>
              <th scope="col">System Date</th>
              <th scope="col">Booking Duration</th>
              <th scope="col">Price</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            {flatRent.map((flatR, key) => (
              <tr key={key}>
                <td>{flatR.user_name}</td>
                <td>{flatR.dateandtime}</td>
                <td>{flatR.booking_months}-Months</td>
                <td>{flatR.f_price}</td>
                <td>{flatR.loc_name}</td>
                <td>
                  {flatR.b_status === "0"
                    ? "Rejected"
                    : flatR.b_status === "0"
                    ? "Accepted"
                    : "Pending"}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <hr />

      <div className="container mt-5 mb-5">
        <h5>Flat Booking (Buy)</h5>
        <div className="row">
          <div className="col-md-12"></div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Booking By</th>
              <th scope="col">System Date</th>
              <th scope="col">Quated Price</th>
              <th scope="col">Requested Price</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            {flatBuy.map((flatB, key) => (
              <tr key={key}>
                <td>{flatB.user_name}</td>
                <td>{flatB.dateandtime}</td>
                <td>{flatB.f_price}</td>
                <td>{flatB.quoted_price}</td>
                <td>{flatB.loc_name}</td>
                <td>
                  {flatB.b_status === "0"
                    ? "Rejected"
                    : flatB.b_status === "0"
                    ? "Accepted"
                    : "Pending"}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <hr />

      <div className="container mt-5 mb-5">
        <h5>Plot Booking (Buy)</h5>
        <div className="row">
          <div className="col-md-12"></div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Booking By</th>
              <th scope="col">System Date</th>
              <th scope="col">Quated Price</th>
              <th scope="col">Requested Price</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            {PlotBuy.map((PlotB, key) => (
              <tr key={key}>
                <td>{PlotB.user_name}</td>
                <td>{PlotB.dateandtime}</td>
                <td>{PlotB.p_price}</td>
                <td>{PlotB.quote_price}</td>
                <td>{PlotB.loc_name}</td>
                <td>
                  {PlotB.b_status === "0"
                    ? "Rejected"
                    : PlotB.b_status === "0"
                    ? "Accepted"
                    : "Pending"}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <div className="container mt-5 mb-5">
        <h5>Room Booking (Rent)</h5>
        <div className="row">
          <div className="col-md-12"></div>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Booking By</th>
              <th scope="col">System Date</th>
              <th scope="col">Booking Date</th>
              <th scope="col">Booking Duration</th>
              <th scope="col">Price</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            {rooms.map((room, key) => (
              <tr key={key}>
                <td>{room.user_name}</td>
                <td>{room.dateandtime}</td>
                <td>{room.booking_date}</td>
                <td>{room.booking_days}-Days</td>
                <td>{room.r_price}</td>
                <td>{room.loc_name}</td>
                <td>
                  {room.b_status === "0"
                    ? "Rejected"
                    : room.b_status === "0"
                    ? "Accepted"
                    : "Pending"}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </>
  );
}

export default Bookings;
