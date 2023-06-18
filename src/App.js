import "./App.css";
import Navbar from "./components/Navbar";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Buy from "./components/Buy";
import Home from "./components/Home";
import Contact from "./components/Contact";
import Rent from "./components/Rent";
import About from "./components/About";
import Register from "./components/Register";
import Signin from "./components/Signin";
import Housebuy from "./components/Housebuy";
import Plotbuy from "./components/Plotbuy";
import Houses from "./components/Houses";
import Plots from "./components/Plots";
import Rooms from "./components/Rooms";
import Flats from "./components/Flats";
import Footer from "./components/Footer";
import RoomRent from "./components/RoomRent";
import FlatRent from "./components/FlatRent";
import ThankYou from "./components/ThankYou";
import BookingHouse from "./components/BookingHouse";
import BuyHouse from "./components/BuyHouse";
import BuyPlot from "./components/BuyPlot";
import BookingFlat from "./components/BookingFlat";
import BuyFlat from "./components/BuyFlat";
import BookingRoom from "./components/BookingRoom";
import Booked from "./components/Booked";
import Bookings from "./components/Bookings";

function App() {
  return (
    <>
      <Router>
        <Navbar
          buy="Buy"
          rent="Rent"
          about="About Us"
          contact="Contact Us"
          register="Register"
          signin="Sign In"
        />

        <Routes>
          <Route index element={<Home />} />

          <Route path="/housebuy/:id" element={<Housebuy />} />

          <Route path="/plotbuy/:id" element={<Plotbuy />} />

          <Route path="/roomrent/:id" element={<RoomRent />} />

          <Route path="/flatrent/:id" element={<FlatRent />} />

          <Route path="/buy" element={<Buy />} />

          <Route path="/contact" element={<Contact />} />

          <Route path="/rent" element={<Rent />} />

          <Route path="/about" element={<About />} />

          <Route path="/register" element={<Register />} />

          <Route path="/signin" element={<Signin />} />

          <Route path="/houses" element={<Houses />} />

          <Route path="/plots" element={<Plots />} />

          <Route path="/rooms" element={<Rooms />} />

          <Route path="/flats" element={<Flats />} />

          <Route path="/thankyou" element={<ThankYou />} />

          <Route path="/bookinghouse/:id" element={<BookingHouse />} />

          <Route path="/buyhouse/:id" element={<BuyHouse />} />

          <Route path="/buyplot/:id" element={<BuyPlot />} />

          <Route path="/bookingflat/:id" element={<BookingFlat />} />

          <Route path="/buyflat/:id" element={<BuyFlat />} />

          <Route path="/bookingroom/:id" element={<BookingRoom />} />

          <Route path="/booked" element={<Booked />} />

          <Route path="/bookings" element={<Bookings />} />
        </Routes>

        <Footer />
      </Router>
    </>
  );
}

export default App;
