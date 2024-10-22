@extends('layout.user-layout')

@section('user-content')
<div class="container w-full p-5 mx-auto">
    <div class="mb-5 title-area">
        <div class="title">
            <h2 class="text-2xl font-bold">Buy Your Seat</h2>
            <span class="text-gray-500">Dashboard / Buy Your Seat / Reserve Seat</span>
        </div>
    </div>
    <div class="p-5 bg-white rounded-lg shadow-lg">
        <div class="flex flex-wrap space-x-10">
            <!-- Left Side: Fill All Details -->
            <div class="flex-1 w-full md:w-1/2 fill-space">
                <div class="text-lg font-semibold fill-title">Fill All Details</div>
                <div class="my-2 border-b border-gray-300 hori-line"></div>
                <div class="mt-3 under-line">
                    <div class="flex flex-wrap space-y-6 md:flex-nowrap md:space-y-0">
                        <!-- Left side -->
                        <div class="w-full space-y-4 md:w-1/2 details">
                            <div class="detail">
                                <div class="font-semibold detail-title">First Name</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Last Name</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Phone Number</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Train Name</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Train Number</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Station Name</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Start Point</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Destination Point</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Arrival Time</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Departure Time</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Train Fare 1st Class</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Train Fare 2nd Class</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="font-semibold detail-title">Train Fare 3rd Class</div>
                                <div class="detail-content">
                                    <span class="block w-full mt-1"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="flex-1 w-full mt-5 md:mt-0 md:w-1/2 select-pass" id="select-pass">
                            <div class="select-nav">
                                <div class="font-semibold select-title">Passenger Information</div>
                            </div>

                            <div class="p-6 bg-white rounded-lg shadow-md">
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold text-gray-700" for="noOfUsers">No of Passengers</label>
                                    <input type="number" min="1" max="5" name="noOfUsers" id="noOfUsers"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                        placeholder="Enter the number of passengers" required onchange="updatePrice()">
                                </div>
                            
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold text-gray-700" for="ticketClass">Ticket Class</label>
                                    <select name="ticketClass" id="ticketClass"
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                                        required onchange="updatePrice()">
                                        <option value="" disabled selected>Select Class</option>
                                        <option value="1st Class">1st Class</option>
                                        <option value="2nd Class">2nd Class</option>
                                        <option value="3rd Class">3rd Class</option>
                                    </select>
                                </div>
                            
                                <div class="p-4 mt-4 bg-gray-100 rounded-md">
                                    <div class="text-lg font-medium text-gray-600" id="classPrice">Fare: Rs. 0</div>
                                    <div class="mt-2 text-lg font-semibold text-green-600">
                                        Total Fare: Rs. <span id="totalPrice">0</span>
                                    </div>
                                    <input type="hidden" id="oneperson" name="oneperson">
                                </div>
                            
                                <div class="flex justify-between mt-6">
                                    <button class="px-6 py-3 text-white transition duration-150 ease-in-out bg-green-500 rounded-lg hover:bg-green-600"
                                        onclick="redirectToCheckout()">Checkout</button>
                                </div>
                            </div>
                            
                    </div>


                </div>

            </div>


        </div>
    </div>
</div>
@endsection