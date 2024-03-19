using System;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class frmSMS : Form
    {
        public frmSMS()
        {
            InitializeComponent();
        }

        com.payamakpardaz.panel.smsSendWebServiceforPHP SMS_WebService = new com.payamakpardaz.panel.smsSendWebServiceforPHP();

        com.payamakpardaz.panel.SendType sendtype = com.payamakpardaz.panel.SendType.DynamicText;
        com.payamakpardaz.panel.SmsMode smsmode = com.payamakpardaz.panel.SmsMode.SaveInPhone;

        string username, password, domain, line_number;
        long[] smsid;

        private void SetValues()
        {
            username = txtUsername.Text;
            password = txtPassword.Text;
            domain = txtDomain.Text.Trim();
            line_number = txtLineNumber.Text.Trim();
        }

        private void BtnSendSMS_Click(object sender, EventArgs e)
        {
            SetValues();

            #region SendSMS
            smsid = new long[1];
            smsid = SMS_WebService.SendSms(username, password, domain, new string[] { txtText.Text.Trim() },
                new string[] { txtMobile.Text.Trim() }, line_number, sendtype, smsmode);
            MessageBox.Show("پیامک با موفقیت ارسال گردید");
            #endregion

        }

        private void btnGetDelivery_Click(object sender, EventArgs e)
        {
            try
            {
                SetValues();

                int[] SmsDeliveryStatus = SMS_WebService.GetDelivery(username, password, domain, smsid);
                MessageBox.Show(SmsDeliveryStatus[0].ToString(), "وضعیت پیامک", MessageBoxButtons.OK,
                    MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
                return;
            }
        }

        private void btn_DeleteReceivedSMS_Click(object sender, EventArgs e)
        {
            SetValues();

            com.payamakpardaz.panel.ReceiveSMS[] receivedsms;
            com.payamakpardaz.panel.ReceiveSMS sms = new com.payamakpardaz.panel.ReceiveSMS();

            receivedsms = SMS_WebService.GetReceiveSMSWithNumber(username, password, domain,
                com.payamakpardaz.panel.ReceiveType.WithDate, line_number, null, "1396/01/01", "1396/01/31");
            if (receivedsms.Length > 0)
            {
                decimal[] receivedcodes = new decimal[receivedsms.Length];
                for (int i = 0; i < receivedsms.Length; i++)
                {
                    receivedcodes[i] = Convert.ToDecimal(receivedsms[i].reciveCode);
                }
                SMS_WebService.DeleteReceiveSMS(username, password, domain, receivedcodes);
                MessageBox.Show("OK");
            }
        }

        private void btnGetCredit_Click(object sender, EventArgs e)
        {
            SetValues();

            string credit = SMS_WebService.getCredit(username, password, domain);
            MessageBox.Show("موجودی پنل : " + credit, "اعتبار", MessageBoxButtons.OK, MessageBoxIcon.Information);

        }

        private void frmSMS_Load(object sender, EventArgs e)
        {

        }

        private void btnReceiveSMS_Click(object sender, EventArgs e)
        {
            SetValues();

            com.payamakpardaz.panel.ReceiveSMS[] receivedsms;
            com.payamakpardaz.panel.ReceiveSMS sms = new com.payamakpardaz.panel.ReceiveSMS();

            //Get Read/ Unread Messages
            // جهت دریافت کلیه پیامک های خوانده نشده ، از بازه تاریخ بلند مدت استفاده نمایید ، مثل 1390 / 01 / 01 تا تاریخ جاری
            receivedsms = SMS_WebService.ReceiveMessaage(username, password, domain,
                com.payamakpardaz.panel.ReceiveSmsType.CurrentDate, "", "", txtLineNumber.Text.Trim());
            if (receivedsms.Length > 0)
            {
                String text = receivedsms[0].SmsText;
                String mobile = receivedsms[0].FromNumber;
                String line = receivedsms[0].ReceiveNumber;
                String Date = receivedsms[0].Date;
                String Time = receivedsms[0].Time;

                for (int i = 0; i < receivedsms.Length; i++)
                {
                    String code = receivedsms[i].reciveCode;
                    decimal receivecode = Convert.ToDecimal(code);
                    //SMS_WebService.ReadReceiveSMS(username, password, domain, receivecode);
                    // این متد آی دی پیامک را دریافت و وضعیت پیامک را به خوانده شده تغییر می دهد
                }
                MessageBox.Show("OK");
            }
        }
    }
}
