import "./App.css";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import {
  Navbar,
  Buy,
  Home,
  Contact,
  Rent,
  About,
  Register,
  Signin,
  Housebuy,
  Plotbuy,
  Houses,
  Plots,
  Rooms,
  Flats,
  Footer,
  RoomRent,
  FlatRent,
  ThankYou,
  BookingHouse,
  BuyHouse,
  BuyPlot,
  BookingFlat,
  BuyFlat,
  BookingRoom,
  Booked,
  Bookings
} from "./components/index";

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
