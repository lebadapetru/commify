import * as React from 'react';
import CssBaseline from '@mui/material/CssBaseline';
import Button from '@mui/material/Button';
import { useEffect, useState } from 'react';
import NumberInput from '@/Components/NumberInput';
import Grid from '@mui/material/Grid2';
import Box from '@mui/material/Box';
import { CardContent, Card, CardHeader } from '@mui/material';
import axios from 'axios';
import _ from 'lodash';

export default function Welcome() {
    const [paySlip, setPaySlip] = useState(null);
    const [salary, setSalary] = useState(0);

    const handleCalculate = () => {
        axios
            .post('/tax-bands/calculate-salary', {salary: salary})
            .then((response) => {
                setPaySlip(response.data.data)
            });
    };

    return (
        <React.Fragment>
            <CssBaseline />
            <Box
                display="flex"
                justifyContent="center"
                alignItems="center"
                minHeight="100vh"
            >
            <Card style={{width: '500px'}}>
                <CardHeader
                    title={
                        <Box sx={{ flexGrow: 1 }}>
                            <Grid container spacing={2}>
                                <Grid size={8}>
                                    <NumberInput
                                        aria-label="Demo number input"
                                        placeholder="Type a number…"
                                        value={salary}
                                        min={0}
                                        setValue={setSalary}
                                    />
                                </Grid>
                                <Grid size={4}>
                                    <Button onClick={handleCalculate} variant={"contained"}>Calculate</Button>
                                </Grid>
                            </Grid>
                        </Box>
                    }
                />
                <CardContent>
                    <ul>
                        {paySlip && Object.entries(paySlip).map(([key, value]) => (
                            <li key={key}>
                                <strong>{_.startCase(_.toLower(key))}:</strong> {value}
                            </li>
                        ))}
                    </ul>
                </CardContent>
            </Card>
            </Box>
        </React.Fragment>
    );
}
