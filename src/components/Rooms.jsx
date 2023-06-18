import axios from "axios";
import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

function Rooms() {
  const [rooms, setRooms] = useState([]);
  useEffect(() => {
    getRooms();
  }, []);

  function getRooms() {
    axios.get("http://localhost/FYP/api/rooms.php").then((res) => {
      setRooms(res.data);
    });
  }

  const navigate = useNavigate();

  const getRoomsInd = (id) => {
    navigate(`/roomrent/${id}`);
  };

  return (
    <>
      <div className="container mt-5 mb-5">
        <h1 className="fw-bold">Rooms</h1>
      </div>
      <div className="container-sm d-flex mt-3 mb-5">
        <div className="row">
          {rooms.map((room, key) => (
            <div className="col-md-4">
              <div
                className="card img-hover-zoom img-hover-zoom--brightness p-2"
                key={key}
              >
                <img
                  src={require(`../images/${room.g_img}`)}
                  className="card-img-top"
                  alt="House"
                />
                <div className="card-body">
                  <h5 className="card-title">Owner: {room.o_name}</h5>
                  <hr />

                  <p>Location: {room.loc_name}</p>
                  <p>Price: {room.r_price} Pkr</p>

                  <div className="text-center">
                    <button
                      type="submit"
                      className="btn btn-outline-primary px-3  rounded-pill"
                      onClick={() => getRoomsInd(room.r_id)}
                    >
                      View Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </>
  );
}

export default Rooms;
