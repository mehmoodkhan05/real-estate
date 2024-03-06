import axios from "axios";
import React, { useState } from "react";
import { useNavigate, useParams } from "react-router-dom";

function BookingFlat() {
  const { id } = useParams();
  console.log(id);

  const navigate = useNavigate();
  const [inputs, setInputs] = useState({});

  const handleChange = (e) => {
    const name = e.target.name;
    const value = e.target.value;

    setInputs((values) => ({ ...values, [name]: value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const token = localStorage.getItem("email");
    axios
      .post(
        `http://localhost/FYP/api/bookingFlat.php?f_id=${id}&token=${token}`,
        inputs
      )
      .then((res) => {
        navigate("/booked");
      });
  };

  return (
    <>
      <section className="bg-image">
        <div className="mask d-flex align-items-center h-100 gradient-custom-3">
          <div className="container h-100 mt-5 mb-5 ">
            <div className="row d-flex justify-content-center align-items-center h-100">
              <div className="col-12 col-md-9 col-lg-7 col-xl-6">
                <div className="card regInner">
                  <div className="card-body p-5">
                    <h2 className="text-uppercase text-center text-dark mb-5 regHeading">
                      Flat Booking
                    </h2>
                    <p className="text-center">
                      Your profile details will be attached to the booking!
                    </p>

                    <form method="POST">
                      <div className="form-outline mb-4">
                        <input
                          type="text"
                          name="name"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example1cg">
                          Your Name
                        </label>
                      </div>

                      <div className="form-outline mb-4">
                        <input
                          type="date"
                          name="booking_date"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example3cg">
                          Booking Date
                        </label>
                      </div>

                      <div className="form-outline mb-4">
                        <input
                          type="number"
                          name="booking_months"
                          onChange={handleChange}
                          className="form-control form-control-lg regForm"
                          required
                        />
                        <label className="form-label" htmlFor="form3Example3cg">
                          Booking Months
                        </label>
                      </div>

                      <div className="d-flex justify-content-center mt-5">
                        <button onClick={handleSubmit} className="button">
                          Submit Booking
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default BookingFlat;
