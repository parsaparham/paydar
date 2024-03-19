namespace WindowsFormsApplication1
{
    partial class frmSMS
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.label6 = new System.Windows.Forms.Label();
            this.txtLineNumber = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.txtPassword = new System.Windows.Forms.TextBox();
            this.txtDomain = new System.Windows.Forms.TextBox();
            this.txtUsername = new System.Windows.Forms.TextBox();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.label5 = new System.Windows.Forms.Label();
            this.txtText = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.txtMobile = new System.Windows.Forms.TextBox();
            this.groupBox3 = new System.Windows.Forms.GroupBox();
            this.btn_DeleteReceivedSMS = new System.Windows.Forms.Button();
            this.btnReceiveSMS = new System.Windows.Forms.Button();
            this.btnGetCredit = new System.Windows.Forms.Button();
            this.btnGetDelivery = new System.Windows.Forms.Button();
            this.BtnSendSMS = new System.Windows.Forms.Button();
            this.groupBox1.SuspendLayout();
            this.groupBox2.SuspendLayout();
            this.groupBox3.SuspendLayout();
            this.SuspendLayout();
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.label6);
            this.groupBox1.Controls.Add(this.txtLineNumber);
            this.groupBox1.Controls.Add(this.label3);
            this.groupBox1.Controls.Add(this.label2);
            this.groupBox1.Controls.Add(this.label1);
            this.groupBox1.Controls.Add(this.txtPassword);
            this.groupBox1.Controls.Add(this.txtDomain);
            this.groupBox1.Controls.Add(this.txtUsername);
            this.groupBox1.Location = new System.Drawing.Point(12, 12);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(609, 95);
            this.groupBox1.TabIndex = 0;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Login";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(377, 61);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(73, 13);
            this.label6.TabIndex = 15;
            this.label6.Text = "Line Number :";
            // 
            // txtLineNumber
            // 
            this.txtLineNumber.Location = new System.Drawing.Point(456, 58);
            this.txtLineNumber.Name = "txtLineNumber";
            this.txtLineNumber.Size = new System.Drawing.Size(136, 20);
            this.txtLineNumber.TabIndex = 3;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(16, 27);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(49, 13);
            this.label3.TabIndex = 13;
            this.label3.Text = "Domain :";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(195, 61);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(59, 13);
            this.label2.TabIndex = 12;
            this.label2.Text = "Password :";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(16, 61);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(61, 13);
            this.label1.TabIndex = 11;
            this.label1.Text = "Username :";
            // 
            // txtPassword
            // 
            this.txtPassword.Location = new System.Drawing.Point(260, 58);
            this.txtPassword.Name = "txtPassword";
            this.txtPassword.PasswordChar = '*';
            this.txtPassword.Size = new System.Drawing.Size(100, 20);
            this.txtPassword.TabIndex = 2;
            // 
            // txtDomain
            // 
            this.txtDomain.Location = new System.Drawing.Point(83, 24);
            this.txtDomain.Name = "txtDomain";
            this.txtDomain.Size = new System.Drawing.Size(277, 20);
            this.txtDomain.TabIndex = 0;
            this.txtDomain.Text = "panel.raysansms";
            // 
            // txtUsername
            // 
            this.txtUsername.Location = new System.Drawing.Point(83, 58);
            this.txtUsername.Name = "txtUsername";
            this.txtUsername.Size = new System.Drawing.Size(100, 20);
            this.txtUsername.TabIndex = 1;
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.label5);
            this.groupBox2.Controls.Add(this.txtText);
            this.groupBox2.Controls.Add(this.label4);
            this.groupBox2.Controls.Add(this.txtMobile);
            this.groupBox2.Location = new System.Drawing.Point(12, 113);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(609, 80);
            this.groupBox2.TabIndex = 1;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "Send SMS";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(220, 39);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(34, 13);
            this.label5.TabIndex = 11;
            this.label5.Text = "Text :";
            // 
            // txtText
            // 
            this.txtText.Location = new System.Drawing.Point(260, 19);
            this.txtText.Multiline = true;
            this.txtText.Name = "txtText";
            this.txtText.Size = new System.Drawing.Size(332, 48);
            this.txtText.TabIndex = 1;
            this.txtText.Text = "تست وب سرویس";
            this.txtText.TextAlign = System.Windows.Forms.HorizontalAlignment.Right;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(16, 39);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(84, 13);
            this.label4.TabIndex = 10;
            this.label4.Text = "Phone Number :";
            // 
            // txtMobile
            // 
            this.txtMobile.Location = new System.Drawing.Point(106, 36);
            this.txtMobile.Name = "txtMobile";
            this.txtMobile.Size = new System.Drawing.Size(100, 20);
            this.txtMobile.TabIndex = 0;
            // 
            // groupBox3
            // 
            this.groupBox3.Controls.Add(this.btn_DeleteReceivedSMS);
            this.groupBox3.Controls.Add(this.btnReceiveSMS);
            this.groupBox3.Controls.Add(this.btnGetCredit);
            this.groupBox3.Controls.Add(this.btnGetDelivery);
            this.groupBox3.Controls.Add(this.BtnSendSMS);
            this.groupBox3.Location = new System.Drawing.Point(12, 199);
            this.groupBox3.Name = "groupBox3";
            this.groupBox3.Size = new System.Drawing.Size(609, 97);
            this.groupBox3.TabIndex = 2;
            this.groupBox3.TabStop = false;
            // 
            // btn_DeleteReceivedSMS
            // 
            this.btn_DeleteReceivedSMS.Location = new System.Drawing.Point(212, 57);
            this.btn_DeleteReceivedSMS.Name = "btn_DeleteReceivedSMS";
            this.btn_DeleteReceivedSMS.Size = new System.Drawing.Size(213, 23);
            this.btn_DeleteReceivedSMS.TabIndex = 4;
            this.btn_DeleteReceivedSMS.Text = "5 - Delete Received SMS";
            this.btn_DeleteReceivedSMS.UseVisualStyleBackColor = true;
            this.btn_DeleteReceivedSMS.Click += new System.EventHandler(this.btn_DeleteReceivedSMS_Click);
            // 
            // btnReceiveSMS
            // 
            this.btnReceiveSMS.Location = new System.Drawing.Point(19, 57);
            this.btnReceiveSMS.Name = "btnReceiveSMS";
            this.btnReceiveSMS.Size = new System.Drawing.Size(187, 23);
            this.btnReceiveSMS.TabIndex = 3;
            this.btnReceiveSMS.Text = "4 - Receive SMS";
            this.btnReceiveSMS.UseVisualStyleBackColor = true;
            this.btnReceiveSMS.Click += new System.EventHandler(this.btnReceiveSMS_Click);
            // 
            // btnGetCredit
            // 
            this.btnGetCredit.Location = new System.Drawing.Point(431, 19);
            this.btnGetCredit.Name = "btnGetCredit";
            this.btnGetCredit.Size = new System.Drawing.Size(161, 23);
            this.btnGetCredit.TabIndex = 2;
            this.btnGetCredit.Text = "3 - Get Credit";
            this.btnGetCredit.UseVisualStyleBackColor = true;
            this.btnGetCredit.Click += new System.EventHandler(this.btnGetCredit_Click);
            // 
            // btnGetDelivery
            // 
            this.btnGetDelivery.Location = new System.Drawing.Point(212, 19);
            this.btnGetDelivery.Name = "btnGetDelivery";
            this.btnGetDelivery.Size = new System.Drawing.Size(213, 23);
            this.btnGetDelivery.TabIndex = 1;
            this.btnGetDelivery.Text = "2 - Get Delivery";
            this.btnGetDelivery.UseVisualStyleBackColor = true;
            this.btnGetDelivery.Click += new System.EventHandler(this.btnGetDelivery_Click);
            // 
            // BtnSendSMS
            // 
            this.BtnSendSMS.Location = new System.Drawing.Point(19, 19);
            this.BtnSendSMS.Name = "BtnSendSMS";
            this.BtnSendSMS.Size = new System.Drawing.Size(187, 23);
            this.BtnSendSMS.TabIndex = 0;
            this.BtnSendSMS.Text = "1 - Send SMS";
            this.BtnSendSMS.UseVisualStyleBackColor = true;
            this.BtnSendSMS.Click += new System.EventHandler(this.BtnSendSMS_Click);
            // 
            // frmSMS
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(633, 308);
            this.Controls.Add(this.groupBox3);
            this.Controls.Add(this.groupBox2);
            this.Controls.Add(this.groupBox1);
            this.Name = "frmSMS";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Web Service";
            this.Load += new System.EventHandler(this.frmSMS_Load);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.groupBox2.ResumeLayout(false);
            this.groupBox2.PerformLayout();
            this.groupBox3.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtPassword;
        private System.Windows.Forms.TextBox txtDomain;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox txtText;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox txtMobile;
        private System.Windows.Forms.GroupBox groupBox3;
        private System.Windows.Forms.Button btnGetDelivery;
        private System.Windows.Forms.Button BtnSendSMS;
        private System.Windows.Forms.Button btnGetCredit;
        private System.Windows.Forms.TextBox txtUsername;
        private System.Windows.Forms.Button btnReceiveSMS;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.TextBox txtLineNumber;
        private System.Windows.Forms.Button btn_DeleteReceivedSMS;
    }
}

