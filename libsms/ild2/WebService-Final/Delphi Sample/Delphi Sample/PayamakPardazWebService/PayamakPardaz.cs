namespace PayamakPardazWebService
{
    using System;
    using System.Runtime.InteropServices;
    using PayamakPardazWebService.com.raysansms.panel;

    [Guid("aca696ff-e4c6-47be-9ea9-7dd97507e4e4"), ClassInterface(ClassInterfaceType.AutoDual), ProgId("PayamakPardaz"), ComVisible(true)]
    public class PayamakPardaz
    {
        private smsSendWebService raysanco = new smsSendWebService();

        //////////////////////////////////////////////// .:. Login .:. ///////////////////////////////////////////
        [ComVisible(true)]
        public void Login(string UserName, string Password, string DomainName)
        {
            // Enable Session Status
            this.raysanco.CookieContainer = new System.Net.CookieContainer();

            // Login
            this.raysanco.Login(UserName, Password, DomainName);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Send Multi SMS .:. //////////////////////////////////
        [ComVisible(true)]
        public long[] SendSMS(string[] SmsText, string[] MobileNumber, string SenderNumber, SendType sendType, SmsMode smsMode)
        {
            return this.raysanco.SendSms(SmsText, MobileNumber, SenderNumber, sendType, smsMode);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Send Single SMS .:. /////////////////////////////////
        [ComVisible(true)]
        public long SendSingleSMS(string SmsText, string MobileNumber, string SenderNumber, SmsMode smsMode)
        {
            return this.raysanco.SendSingleSms(SmsText, MobileNumber, SenderNumber, smsMode);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Get Deliver Status .:. //////////////////////////////
        [ComVisible(true)]
        public int[] GetDelivery(long[] SmsId)
        {
            return this.raysanco.GetDelivery(SmsId);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Send SMS In Future .:. //////////////////////////////
        [ComVisible(true)]
        public int SendFutureSms(string LineNumber, string ReceiveNumber, string Date, string Time, string Text)
        {
            return this.raysanco.SendFutureSms(LineNumber, ReceiveNumber, Date, Time, Text);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Check Status Send Future .:. ////////////////////////
        [ComVisible(true)]
        public string CheckSendFuture(int SmsID)
        {
            return this.raysanco.CheckSendFuture(SmsID);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Get Credit .:. //////////////////////////////////////
        [ComVisible(true)]
        public string GetCredit(string UserName, string Password, string DomainName)
        {
            return this.raysanco.getCredit();
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Get Receive SMS From All Lines .:. //////////////////
        [ComVisible(true)]
        public ReceiveSMS[] GetReceiveSMS(ReceiveType RecType, int Count, string FromDate, string ToDate)
        {
            return this.raysanco.GetReceiveSMS(com.raysansms.panel.ReceiveType.All, null, "", "");
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Get Receive SMS From One Line .:. ///////////////////
        [ComVisible(true)]
        public ReceiveSMS[] GetReceiveSMSWithNumber(ReceiveType RecType, string LineNumber, int Count, string FromDate, string ToDate)
        {
            return this.raysanco.GetReceiveSMSWithNumber(com.raysansms.panel.ReceiveType.All, "3000XXXX", null, "", "");
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Get Count of All Receive SMS .:. ////////////////////
        public int GetCountAllLines()
        {
            return raysanco.GetCountAll();
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////// .:. Get Count Of One Line Receive SMS  .:. //////////////
        public int GetCountOneLines(string LineNumber)
        {
            return raysanco.GetCount(LineNumber);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
}
