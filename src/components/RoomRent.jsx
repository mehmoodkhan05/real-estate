import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link, useNavigate, useParams } from "react-router-dom";

function RoomRent() {
  const { id } = useParams();
  const [rooms, setRooms] = useState([]);
  useEffect(() => {
    getRooms();
  }, []);

  function getRooms() {
    axios
      .get(`http://localhost/FYP/api/roomsIndividual.php?id=${id}`)
      .then((res) => {
        setRooms(res.data);
      });
  }

  const navigate = useNavigate();

  const getRoomsInd = (id) => {
    navigate(`/bookingroom/${id}`);
  };

  const token = localStorage.getItem("email");

  return (
    <div className="container">
      {rooms.map((room, key) => (
        <>
          <div className="row mt-5 ">
            <div className="col-md-6">
              <img
                className="buyImg mt-5 mb-5"
                src={require(`../images/${room.g_img}`)}
                alt=""
              />
            </div>

            <div className="col-3">
              <h3 className="mt-5">Features</h3>
              <ul className="mt-3">
                <li className="pt-3">
                  Room AC: {room.r_ac === "1" ? " Yes" : " No"}
                </li>

                <li className="pt-3">Room Area: {room.r_area} SQFT</li>

                <li className="pt-3">
                  TelePhone Facility:{" "}
                  {room.r_telephone === "1" ? " Yes" : " No"}
                </li>

                <li className="pt-3">
                  Bathroom: {room.r_bath_room === "1" ? " Yes" : " No"}
                </li>

                <li className="pt-3">
                  Gas Facility: {room.r_gas === "1" ? " Yes" : " No"}
                </li>

                <li className="pt-3">
                  Heater Facility: {room.r_heater === "1" ? " Yes" : " No"}
                </li>
              </ul>
            </div>

            <div className="col-3 mt-5">
              <h3 className="mt-5"></h3>
              <ul>
                <li className="pt-3">
                  Bed Size:
                  {room.r_bed_size === "1"
                    ? "Queen Size"
                    : room.r_bed_size === "2"
                    ? "King Size"
                    : room.r_bed_size === "3"
                    ? "Single Bed"
                    : "Twin Bed"}
                </li>
                <li className="pt-3">Price: {room.r_price} Pkr</li>
                <li className="pt-3">Location: {room.loc_name}</li>
                <li className="pt-3">Address: {room.r_address}</li>
              </ul>
            </div>
          </div>

          <div className="row">
            <div className="col-md-9"></div>
            <div className="col-md-3 mb-5">
              {!token ? (
                <Link to="/signin" className="btn btn-outline-primary mt-4">
                  Proceed Sign-In
                </Link>
              ) : (
                <button
                  type="submit"
                  className="btn btn-outline-primary px-3"
                  onClick={() => getRoomsInd(room.r_id)}
                >
                  Proceed to Booking
                </button>
              )}
            </div>
          </div>
        </>
      ))}
    </div>
  );
}

export default RoomRent;
