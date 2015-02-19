/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package huv.master.soa.webservice;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.Instant;
import java.util.Date;
import java.util.concurrent.TimeUnit;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author Huvber
 */
@WebService(serviceName = "webservice")
public class webservice {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "calcDaysRemain")
    public String calcDaysRemain(@WebParam(name = "date") String date) {
        //TODO write your implementation code here:
        DateFormat f = new SimpleDateFormat("dd-MM-yyyy");
        Date dd;
        try {
            dd = f.parse(date);
        } catch (ParseException ex) {
            return "Misformat date";
        }
        Date d = new Date();
        long diff = getDateDiff(dd,d,TimeUnit.DAYS);
        return d.toString()+ " - " + dd.toString() +" = " + Long.toString(diff);
    }
    private static long getDateDiff(Date date1, Date date2, TimeUnit timeUnit) {
        long diffInMillies = date2.getTime() - date1.getTime();
        return timeUnit.convert(diffInMillies,TimeUnit.MILLISECONDS);
    }
}
