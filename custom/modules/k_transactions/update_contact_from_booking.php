<?php
class updateContactFromBookingClass
{
    public function updateContactFromBooking($bean, $event, $arguments)
    {
        if (!empty($bean->k_bookings_id)) {
                // Load the respective booking record
            $bookingBean = BeanFactory::getBean('k_Bookings', $bean->k_bookings_id);
                // Check if the related contact exists
            if (!empty($bookingBean->contacts_id)) {
                // Load the respective contact record
                // $contactBean = BeanFactory::getBean('Contacts', $bookingBean->contacts_id);

                // Update the contact field in the transaction record with the contact name
                $bean->contacts_id = $bookingBean->contacts_id;
            }
        }
    }
}