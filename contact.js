
const Contact = [
    {date: "Sat Jul 25 2020 14:36:24 GMT-0400 (EDT)", 
        name: "Megan Schmidt", 
        phoneNumber: "8454302831", 
        email: "meganschmidt23@aol.com", 
        subject: "Intro to Proof", 
        message:"Testing 1 2 3", 
        prefContact: "Email"}
]

function addContactInfo (name, phoneNumber, email, subject, message, prefContact) {
    Contact.push(
        {date:Date(), 
        name:name, 
        phoneNumber: phoneNumber,
        email: email,
        subject:subject,
        message: message,
        prefContact: prefContact})
}


module.export ={
    Contact, 
    addContactInfo
}